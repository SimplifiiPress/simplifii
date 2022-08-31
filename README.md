# Simplifii WordPress FSE Theme

![Auto Assign](https://github.com/leogopal/simplifii/actions/workflows/auto-assign.yml/badge.svg) ![Code Quality](https://github.com/leogopal/simplifii/actions/workflows/lint.yml/badge.svg) ![Codespaces Prebuilds](https://github.com/leogopal/simplifii/actions/workflows/codespaces/create_codespaces_prebuilds/badge.svg) ![DevSkim](https://github.com/leogopal/simplifii/actions/workflows/devskim.yml/badge.svg) ![Generate POT file](https://github.com/leogopal/simplifii/actions/workflows/pot.yml/badge.svg) ![pages-build-deployment](https://github.com/leogopal/simplifii/actions/workflows/pages/pages-build-deployment/badge.svg)

This theme is designed as a block theme to support WordPress full site editing. You must have the Gutenberg Plugin Activate to use this theme before ready for full site editing on released WordPress.

> ### [**Get the Simplifii theme on WordPress.org →**](https://wordpress.org/themes/simplifii/)

![Simplifii on WordPress.org](https://user-images.githubusercontent.com/4948323/187800730-b4e58dda-c100-4e3d-892d-d58d79631c91.png)

## About

Simplifii is a simple multipurpose and flexible Full Site Editing theme for WordPress with WooCommerce support.

## Contributing

If you would like to contribute code, the list of [open issues](https://github.com/leogopal/simplifii/issues) is a great place to start looking for tasks. [Pull requests](https://github.com/leogopal/simplifii/pulls) are preferred when linked to an existing issue.

Contributing is not just for developers! There are many opportunities to help with [testing](#getting-started), triage, discussion, designing and building variations, and more. Please look through [open issues](https://github.com/leogopal/simplifii/issues), and join in wherever you feel most comfortable.

### Contributing Style Variations

A big part of Simplifii is to emphasize a diverse collection of style variations, so this is a great way to contribute to the theme!

#### Design a style variation

This can be done a few different ways, including:

*   Create an alternate theme.json file to the one provided by the theme and change values directly in the code.
*   Make changes in the Global Styles panel in the Site Editor. You can save these changes as a new style variation using the [Create Block Theme plugin](https://wordpress.org/plugins/create-block-theme/).
*   Design static mockups in Figma or a similar program.

#### Submit your style variation

When you're ready to submit, please create a new issue and share your designs:

*   Theme.json files can be submitted as code or as zip files.
*   Add images that showcase the look & feel of the variation.
*   Include a style guide with design specifications — this should include details on typography, colors, spacing, etc. Here’s an [example](https://www.figma.com/community/file/1136340417938880987).

### Getting Started

To get started with development:

1.  Set up a WordPress instance, we recommend [wp-env](https://developer.wordpress.org/block-editor/handbook/tutorials/devenv/) or [Local](https://localwp.com/) as an alternative to docker.
2.  Install the [Gutenberg plugin](https://wordpress.org/plugins/gutenberg/)
3.  Clone / download this repository into your `/wp-content/themes/` directory

### Tips for Contributors

*   Similar to Simplifii, a goal for the theme is to have as little CSS as possible. Much of the theme's visual treatments should be handled by the Block Editor and Global Styles. As a general rule, if multiple themes would benefit from the CSS you're considering adding, it might reasonably be provided by Gutenberg instead. Let's include clear code comments for any CSS we do include.
*   Similarly, let's refrain from building any custom-built PHP or JavaScript-based workarounds for functionality that might reasonably be provided by the Block Editor. Simplifii will be a block theme, so let's keep its code simple.
*   In accordance to those last two bullets, this theme has no required build process.
*   If you've helped contribute to the theme in any way, you deserve credit! Folks will be updating [CONTRIBUTORS.md](CONTRIBUTORS.md) periodically with names of contributors, but feel free to open a PR or issue if we leave someone out.

## Requirements

*   Gutenberg plugin (latest)
*   WordPress 5.9+
*   PHP 5.6+
*   License: [GPLv2](http://www.gnu.org/licenses/gpl-2.0.html) or later

Some theme features / PRs may require Gutenberg trunk and will be described or tagged accordingly.

## Resources

*   [Simplifii Figma Mockups](https://www.figma.com/community/file/1139275543113752375)
*   [Create Block Theme plugin](https://github.com/WordPress/create-block-theme)
*   [Block Theme documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/block-theme-overview)
*   [Global Styles & theme.json documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)
