Goma ENV
=======

Goma ENV provides some basic concepts for PHP applications: Constants about FileSystem, central storage directory, 
cache directory as well as functions to get infos about the current environment. Is also ensures that the data and the 
cache folder are writable.

Available constants
----

* IN_GOMA: defines that this module is loaded
* ROOT: root path of application, e.g. /var/www/
* APPLICATION: data directory path segement, e.g. data
* CACHE_DIRECTORY: cache directory path segement, e.g. data/temp/

Available methods
---
* GomaENV::isPHPUnit(): bool returns if current execution is within PHPUnit
* GomaENV::isCommandLineInterface(): bool returns if current execution is within command line
* GomaENV::getCommandLineArgs(): array returns an assocative array of command line arguments
* GomaENV::getMemoryLimit() : int returns memory limit in bytes
* GomaENV::getCacheDirectory(): string full path to cache directory
* GomaENV::getDataDirectory(): string full path to data directory
* GomaENV::getRoot(): string full path to root

This project belongs to the Goma Framework. See [Project Homepage](https://goma-cms.org).

License: LGPLv3 see [license.txt](license.txt)
