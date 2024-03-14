# TODOs

## Format definition
Todos have the following format
* **Title:** [PRIORITY][MODULE][ID]
  * **Description:** Short description
  * **Depends on:** defines if backlock case is blocked by another case
* **Priority** can have the following values: HIGH,NORMAL or LOW
* **Module** can be any module (folder) of the existing project or 
reserved word SYSTEM for compatibility issues
* **Id** is a unique integer number defined just for the sake of defining
* dependencies

## Backlog
* [HIGH][SYSTEM][1] Increase PHP version to 8.3
  * **Description:** Can't be done as several machines depend on this version.
This could be easilty addressed in a clean environment.
* [HIGH][VENDOR][2] Vendor should be dynamically generated with composer
  * **Description:** Currently, it's just downloaded manually and added to the vendor folder.
  * **Depends on:** 1
* [HIGH][SYSTEM][3] Issues shouldn't be tracked in that readme file but in
gitlab's issue tracker: https://github.com/tpalanques/HMC-tech-test/issues
