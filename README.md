Goma ENV
=======

Goma ENV provides some basic concepts for PHP applications: Constants about FileSystem, central storage directory, 
cache directory as well as functions to get infos about the current environment. Is also ensures that the data and the 
cache folder are writable.

Available constants
----

* IN_GOMA: defines that this module is loaded
* ROOT: root path of application, e.g. /var/www/
* GOMA_DATADIR: data directory path segement, e.g. data
* CACHE_DIRECTORY: cache directory path segement, e.g. data/temp/
* DEV_MODE: boolean whether this environment is in development mode or not

Available methods
---
* GomaENV::isPHPUnit(): bool returns if current execution is within PHPUnit
* GomaENV::isCommandLineInterface(): bool returns if current execution is within command line
* GomaENV::getCommandLineArgs(): array returns an assocative array of command line arguments
* GomaENV::getMemoryLimit() : int returns memory limit in bytes
* GomaENV::getCacheDirectory(): string full path to cache directory
* GomaENV::getDataDirectory(): string full path to data directory
* GomaENV::getRoot(): string full path to root
* GomaENV::getProjectLevelComposerArray(): array returns array of composer.json for root project
* GomaENV::getProjectLevelComposerInstalledArray(): array returns array of installed.json for root project

Configuration
---
This plugin can be configured in the project-level composer file:
* goma_datadir: define data-dir, e.g. mysite
* goma_tempdir: define temp-dir in data-dir, e.g. temp
* goma_dev_mode: define if DEV_MODE is true or false

This project belongs to the Goma Framework. See [Project Homepage](https://goma-cms.org).

License: LGPLv3 see [license.txt](license.txt)
