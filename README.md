creeky
======

Creek Creative WordPress website theme.

This work is licensed under the Creative Commons Attribution-ShareAlike 3.0 Unported License.  
To view a copy of this license, visit <http://creativecommons.org/licenses/by-sa/3.0/deed.en_US>

Instructions for using GruntJS
------------------------------

### Installation

* Install the grunt command-line tool (-g puts it in /usr/local/bin):  
`% sudo npm install -g grunt-cli`
* Install all the packages required to build this:  
(Packages will be installed in ./node_modules - don't accidentally commit this)  
`% cd wp-content/themes/theme_name`  
`% npm install`

### Building

    % grunt

Watch for changes:

    % grunt watch

If you create new `.scss` blocks in `_blocks` directory, restart `% grunt watch`

**NB:** make sure to be using the latest version of [node](http://nodejs.org/). I had a `Bus error: 10` error, solved by [upgrading node](http://stackoverflow.com/questions/20521685/grunt-task-exits-with-bus-error-10).