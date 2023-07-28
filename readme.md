# Base Gutenberg Block

[![Project Status: Concept – Minimal or no implementation has been done yet, or the repository is only intended to be a limited example, demo, or proof-of-concept.](https://www.repostatus.org/badges/latest/concept.svg)](https://www.repostatus.org/#concept)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

The main goal of this repository is to **display the folder structure of a Gutenberg block** and be useful for those who are starting to navigate the Gutenberg blocks world. Also can be used as a base to start building your block.

## Table of Contents

- [Introduction](#base-gutenberg-block)
- [Requirements](#requirements)
- [Usage](#usage)
  - [WordPress Scripts](#wordpress-scripts-package)
- [Block Anatomy](#block-anatomy)
  - [The index.php](#the-indexphp)
  - [The block.json](#the-blockjson)
  - [The attributes](#the-attributes)
  - [The /src folder](#the-src-folder)
    - [index.js](#indexjs)
    - [edit.js](#editjs)
    - [save.js](#savejs-or-frontendjs)
    - [style](#style)
  - [The build folder](#the-build-folder)
- [Extras](#extras)
  - [Custom Category](#custom-category)
  - [Custom Icon](#custom-icon)
  - [Static x Dinamic Blocks](#static-x-dinamic-blocks)
- [License](#license)

## Requirements

- WordPress Environment
- Node.js 14.0.0 or later
- Npm 6.14.4 or later.
- It is not compatible with older versions.
- Knowledge of webpack

## Usage

Clone this repository `git clone https://github.com/sarahcssiqueira/base-gutenberg-block` to the plugins folder at your WordPress installation, as you would do with a regular plugin. After cloning, on the project's root folder, to install the dependencies, run:

`npm install`

### [WordPress Scripts Package](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/)

After running `npm install` the [@wordpress/scripts](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/) dependency will be installed. It uses [webpack](https://webpack.js.org/) behind the scenes ([more details here](https://github.com/WordPress/gutenberg/blob/092fd0b04b9d8abb67a54c3a16fbc03a3493fcb9/docs/how-to-guides/javascript/js-build-setup.md)), so initially, you don't need to worry about setting up your own webpack config.

It’ll look for a webpack config in the top-level directory of your package and will use it if it finds one. If none is found, it’ll use the default config provided by the @wordpress/scripts package, which is preferable.

According to [WordPress developers guide](https://developer.wordpress.org/news/2023/04/how-webpack-and-wordpress-packages-interact/), WordPress found a way to work with JavaScript that requires no imports and doesn’t increase bundle size, because WordPress automatically enqueues and adds these packages to a global wp object, but only for packages that ship with WordPress though.

Because these packages are already available, it makes much more sense to use those instead of bundling them with your custom scripts.

## Block Folder Structure

This project contains a basic folder structure of a Gutenberg block, as is displayed in the image below, and also an overview of each component that you will have to deal with. It's a very basic structure but can be useful for those who are starting to navigate the Gutenberg blocks world.

![block anatomy](https://github.com/sarahcssiqueira/base-gutenberg-block/assets/82296194/9c1989c0-3e98-4da4-812f-93ae60c2dcde)

### The index.php

It is the plugin's main file, on it we will register the Block in PHP using the [register_block_type()](https://developer.wordpress.org/reference/functions/register_block_type/) function.

```
public function base_gutenberg_register() {
        register_block_type( __DIR__ );
    }
```

The function has a lot of arguments by the way, but a simpler approach is to provide all the data directly in the block.json.

### The block.json

The **metadata of your block**, is the canonical way to register block types with both PHP and JavaScript. Here is an [example block.json](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/) for your reference.

### The attributes

Attributes are the way a block stores data, they define how a block is parsed to extract data from the saved content. The attributes are JavaScript objects containing the values, like the example attribute below:

```
//block.json

"attributes": {
        "exampleAttribute": {
            "type": "string"
        }
}
```

In this project, the attributes are passed to both the edit and save functions. The setAttributes function is also passed, but only to the edit function. The setAttributes function is used to set the values.

### The /src folder

Is the Javascript world inside WordPress. This folder is basically your React app (if you decided to use React) inside the block. A basic block project is structured as below:

#### index.js

Index.js is the entry point of the block

```
registerBlockType(metadata, {
  edit: Edit,
  save: Save,
});
```

#### edit.js

Edit.js is where you will build the block admin interface;

#### save.js (or frontend.js)

Save.js (or Frontend.js) is where you will build the block structure to be saved into the database;

#### style

[to do]

### The /build folder

Run `npm run build` to build the optimized files to the build folder.

## Extras

### Custom category

By default, the WordPress core provides categories that you can assign to your Gutenberg block. But you may want to create custom block categories for categorizing your plugin to make them stand out, categorize your blocks based on some features, or any other reason.

To achieve that, you can create your custom block category, using the WordPress block filter `block_categories_all`.

Example: **register_new_category** function:

```
//index.php

       function register_new_category ($categories) {
            $categories[] = array(
                'slug'  => 'custom-category',
                'title' => 'Custom Category'
            );

            return $categories;
        }

        add_filter( 'block_categories_all' , 'register_new_category');

```

### Custom Icon

[to do]

### Static x Dinamic Blocks

[to do]

## License

This project is licensed under the [MIT](https://github.com/sarahcssiqueira/base-gutenberg-block/blob/master/LICENSE) license.
