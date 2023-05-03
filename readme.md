# Basic Gutenberg Block

To use this basic block, just clone this repository and put the files inside your WordPress Plugins folder. I am assuming you already have a WordPress enviroment settled. After clone, run:

` npm install ` 

to install the needed dependencies. Although the only dependence needed is [@wordpress/scripts](https://www.npmjs.com/package/@wordpress/scripts) which you can install by typing:

`npm install @wordpress/scripts --save-dev`

## Requirements

You will need:

- WordPress Enviromnet
- Node.js 14.0.0 or later
- Npm 6.14.4 or later. 
- It is not compatible with older versions.

## Let's get to work!

#### index.php

Rename your plugin to whatever you want to better describe the needs/purpose of your project.

### block.json

Setup the metadata of your block, for example:
 - name
 - version
 - category
 - icon

### /src folder

 - index.js: is the entry point
 - edit.js: is where you’ll build the block admin interface
 - save.js: is where we build the block structure to be saved into the database

### /build folder

Run `npm run build` to build your files to build folder

## Supports attributes