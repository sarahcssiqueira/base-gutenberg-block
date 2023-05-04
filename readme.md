# Gutenberg Basic Static Block

To use this basic block, just clone this repository and put the files inside your WordPress Plugins folder. I am assuming you already have a WordPress environment settled. After to clone, run:

` npm install ` 

to install the needed dependencies. Although the only dependence needed is [@wordpress/scripts](https://www.npmjs.com/package/@wordpress/scripts) which you can install by typing:

`npm install @wordpress/scripts --save-dev`

## Requirements

You will need:

- WordPress Environment
- Node.js 14.0.0 or later
- Npm 6.14.4 or later. 
- It is not compatible with older versions.

## Let's get to work!

#### index.php

Rename your plugin to whatever you want to better describe the needs/purpose of your project.

### block.json

Setup the **metadata of your block**, which the canonical way to register block types with both PHP (server-side) and JavaScript (client-side). Here is an [example block.json](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/).

## Attributes 

Attributes are the way a block stores data, they define how a block is parsed to extract data from the saved content. The attributes is a JavaScript object containing the values of each attribute, or default values if defined.

In this project there's only one attribute, but you can create how many you need.

```
//block.json

"attributes": {
        "exampleAttribute": {
            "type": "string"
        }
}

```

The attributes are passed to both the edit and save functions. The setAttributes function is also passed, but only to the edit function. The setAttributes function is used to set the values.


###  The src folder

 - **index.js:** is the entry point of the block;
 - **edit.js:** is where you will build the block admin interface;
 - **save.js:** is where you will build the block structure to be saved into the database;


### The build folder

After finish run `npm run build` to build your files to the build folder.

### Custom category

By default, the core provides some categories which you can assign to your Gutenberg block. But turns out you may want to create custom block categories for categorizing to your own plugin in order to make them stand out from other Gutenberg blocks, categorize your blocks based on some features, or any other reason. 

You can create your custom block category, using a WordPress block filter block_categories_all. In this project there's a "custom category registered". To change, go to index.php on the **register_new_category** function and change the args.

´´´
//index.php

       function register_new_category ($categories) {
            $categories[] = array(
                'slug'  => 'custom-category',
                'title' => 'Custom Category'
            );
        
            return $categories;
        }

        add_filter( 'block_categories_all' , 'register_new_category');

´´´

