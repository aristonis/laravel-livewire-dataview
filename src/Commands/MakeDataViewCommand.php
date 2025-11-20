<?php

namespace Aristonis\LaravelLivewireDataview\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Features\SupportConsoleCommands\Commands\ComponentParser;

class MakeDataViewCommand extends Command
{
    protected $signature = 'dataview:make 
        {name : The DataView component name (e.g. Users/UserTable)} 
        {--with-item= : Generate item component automatically} 
        {--force : Overwrite existing files}';

    protected $description = 'Create a new DataView component for LaravelLivewireDataview';

    protected ComponentParser $parser;


    public function handle()
    {
        $this->parser = new ComponentParser(
            config('livewire.class_namespace'),
            config('livewire.view_path'),
            $this->argument('name')
        );

        $name = $this->parser->className();

        if ($this->isReserved($name)) {
            $this->error("Class name [$name] is reserved.");

            return;
        }

        $force = $this->option('force');

        $this->createDataViewComponent($force);

        $itemOption = $this->option('with-item');

        if ($itemOption !== null) {
            $this->createItemComponent($itemOption, $force);
        }

        $this->info("DataView component item created successfully.");

        return Command::SUCCESS;
    }


    protected function createDataViewComponent(bool $force)
    {
        $path = $this->parser->classPath();

        if (!$force && File::exists($path)) {
            $this->error("Component already exists: " . $this->parser->relativeClassPath());
            return;
        }

        $this->ensureDirExists($path);

        $stub = file_get_contents(__DIR__ . '/../../stubs/dataview.php.stub');

        $itemOption = $this->option('with-item');

        if ($itemOption !== null) {
            $itemView = $this->normalizeItemView(
                $itemOption === '' ? $this->defaultItemName($this->argument('name')) : $itemOption
            );
        } else {
            $itemView = null;
        }
        $setItemComponent = '// $this->setItemView(\'path.item-view\');  // REQUIRED: must be set';
        if ($itemView) {
            $setItemComponent =  '$this->setItemView(\'' . $itemView . '\');';
        }

        $stub = str_replace(
            ['{{ namespace }}', '{{ class }}', '{{ item_view }}'],
            [
                $this->parser->classNamespace(),
                $this->parser->className(),
                $setItemComponent
            ],
            $stub
        );

        File::put($path, $stub);
    }


    protected function createItemComponent(string $item, bool $force)
    {
        $itemName = $item === ''
            ? $this->defaultItemName($this->argument('name'))
            : $item;



        $className = Str::studly(Str::afterLast($itemName, '/'));
        $classDir = Str::beforeLast($itemName, '/');
        $normalized = $this->normalizeItemView($itemName);

        $classPath = app_path("Livewire/" .$classDir . "/{$className}.php");

        if (!$force && File::exists($classPath)) {
            $this->error("Item component already exists: $classPath");
            return;
        }

        $this->ensureDirExists($classPath);


        $stub = file_get_contents(__DIR__ . '/../../stubs/item-component.php.stub');

        $stub = str_replace(
            ['{{ namespace }}', '{{ class }}', '{{ view_path }}'],
            [
                'App\\Livewire\\' . $classDir,
                $className,
                $normalized
            ],
            $stub
        );

        File::put($classPath, $stub);


        // Create Blade file
        $viewPath = resource_path("views/livewire/" . str_replace('.', '/', $normalized) . ".blade.php");
        $this->ensureDirExists($viewPath);

        File::put($viewPath, file_get_contents(__DIR__ . '/../../stubs/item-component.blade.php.stub'));

        $this->info("Item component created: livewire.$normalized");
    }


    protected function defaultItemName(string $dataviewName): string
    {
        $base = Str::afterLast($dataviewName, '/');
        return Str::studly($base) . 'Item';
    }


    protected function ensureDirExists(string $path)
    {
        $dir = dirname($path);

        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0777, true, true);
        }
    }


    protected function isReserved(string $name): bool
    {
        return in_array(strtolower($name), ['component', 'controller', 'model']);
    }


    protected function normalizeItemView(string $path): string
    {
        $path = str_replace('/', '.', $path);

        $segments = explode('.', $path);
        $last = array_pop($segments);
        $last = Str::kebab($last);

        return strtolower(implode('.', $segments) . '.' . $last);
    }
}
