# Execute
Just change directory to the `system/scripts` folder, then execute:
```sh
. docker.sh restart
```
# Product Backlog

Current backlog is tracked in: https://github.com/tpalanques/HMC-tech-test/issues 

## Format definition
Backlog issues have the following format
* **Title:** [PRIORITY][MODULE]
  * **Description:** Short description
  * **Depends on:** defines if backlog case is blocked by another case.
This should only contain the related issues URL
* **Priority** can have the following values: HIGH,NORMAL or LOW
* **Module** can be any module (folder) of the existing project or 
reserved word SYSTEM for compatibility issues
