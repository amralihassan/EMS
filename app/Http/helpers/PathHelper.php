<?php
// system HMVC
function DS()
{
    return DIRECTORY_SEPARATOR;
}
// get module name
function getModuleName(string $moduleName)
{
    return app_path() . DS() . 'Modules' . DS() . $moduleName . DS();
}
// load file configuration
function loadFileConfiguration(string $fileName, string $moduleName)
{
    return getModuleName($moduleName) . 'Config' . DS() . $fileName . '.php';
}
function loadRoute(string $fileName, string $moduleName)
{
    return getModuleName($moduleName) . 'routes' . DS() . $fileName . '.php';
}
function loadViews(string $moduleName)
{
    return getModuleName($moduleName) . 'resources' . DS() . 'views';
}
function loadMigrations(string $moduleName)
{
    return getModuleName($moduleName) . 'database' . DS() . 'migrations';
}
function loadTranslation(string $moduleName)
{
    return getModuleName($moduleName) . 'resources' . DS() . 'lang';
}
function getNamespaceController(string $moduleName)
{
    return ucfirst($moduleName) . '\Http\Controllers';
}
