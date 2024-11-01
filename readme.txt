=== VS Knowledge Base ===
Contributors: Guido07111975
Version: 7.5
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Requires PHP: 7.0
Requires at least: 5.0
Tested up to: 6.6
Stable tag: 7.5
Tags: simple, knowledge base, faq, frequently asked questions, wiki


With this lightweight plugin you can create a knowledge base that contains your categories and posts.


== Description ==
= About =
With this lightweight plugin you can create a knowledge base that contains your categories and posts.

To display your knowledge base you can use a block, a shortcode or a widget.

You can customize your knowledge base by adding attributes to the block, the shortcode or the widget.

It's also possible to display categories and posts from a custom post type (such as WooCommerce product categories and products).

With this plugin you can also create a FAQ or wiki in the same way as a knowledge base.

= How to use =
After installation add the VS Knowledge Base block or the shortcode `[knowledgebase]` to a page to display your knowledge base.

You can also go to Appearance > Widgets and use the VS Knowledge Base widget.

Default settings categories:

* 4 columns when using block or shortode
* 1 column when using widget
* Order by name
* Ascending order (A-Z)
* Empty categories are hidden
* Parent and subcategories are displayed separately

Default settings posts:

* Order by date
* Descending order (new to old)
* All posts are displayed

= Attributes =
You can customize your knowledge base by adding attributes to the block, the shortcode or the widget.

* Add custom CSS class to knowledge base: `class="your-class-name"`
* Change the number of columns: `columns="3"`
* Disable the columns: `columns="0"`
* Include certain categories: `include="1,3,5"`
* Exclude certain categories: `exclude="8,10,12"`
* Display empty categories too: `hide_empty="0"`
* Display category description: `category_description="true"`
* Change the number of posts per category: `posts_per_category="5"`
* Reverse the order of posts: `order="ASC"`
* Display posts by title: `orderby="title"`
* Display posts in random order: `orderby="rand"`
* Display post counter: `post_count="true"`
* Display post meta (date and author): `post_meta="true"`
* Display View All link: `view_all_link="true"`
* Change label of View All link: `view_all_link_label="your label"`
* Change label of post without title: `no_post_title_label="your label"`
* Change the "no categories are found" text: `no_categories_text="your text"`

Example: `[knowledgebase include="1,3,5" hide_empty="0" post_meta="true"]`

When using the block or the widget, don't add the main shortcode tag or the brackets.

Example: `include="1,3,5" hide_empty="0" post_meta="true"`

With the columns attribute you can set the number of columns between 1 and 4.

The knowledge base becomes 2 columns in small screens (except when number of columns is set to 1).

You can also disable the columns. This can be handy if you only want to use your own styling.

The columns attribute will be ignored when using the block or widget. Because you can set the columns via the block or widget settings.

= Post tags =
Besides displaying posts by category you can also display posts by tag: `taxonomy="post_tag"`

= Custom post types =
It's also possible to display categories and posts from a custom post type (such as WooCommerce product categories and products).

To display these categories and posts you should add 2 attributes: "taxonomy" and "post_type"

WooCommerce:

* Product categories and products: `taxonomy="product_cat" post_type="product"`
* Include product category image: `taxonomy="product_cat" post_type="product" woo_image="true"`
* Display by tag instead of category: `taxonomy="product_tag" post_type="product"`

= Have a question? =
Please take a look at the FAQ section.

= Translation =
Translations are not included, but the plugin supports WordPress language packs.

More [translations](https://translate.wordpress.org/projects/wp-plugins/very-simple-knowledge-base) are very welcome!

The translation folder inside this plugin is redundant, but kept for reference.

= Credits =
Without help and support from the WordPress community I was not able to develop this plugin, so thank you!


== Frequently Asked Questions ==
= Where is the settings page? =
Plugin has no settings page. Use the block, shortcode or widget with attributes to make it work.

= Does this plugin have its own knowledge base post type? =
No, this plugin is build to create a knowledge base that contains the default categories and posts.

It's also possible to display categories and posts from a custom post type (such as WooCommerce product categories and products).

= How can I change the layout or colors? =
You can set the number of columns between 1 and 4 or disable the columns. This can be done via the block or widget settings or via an attribute.

If you disable the columns CSS class "vskb-custom" is added to the knowledge base. This can be handy if you only want to use your own styling.

You can use page Additional CSS of the Customizer for your custom styling.

= Where to find the category ID? =
Every category URL contains an unique ID. You will find this ID when hovering the category title in your dashboard or when editing the category.

It's the number that comes after: `tag_ID=`

= Where to find the tag ID? =
Every tag URL contains an unique ID. You will find this ID when hovering the tag title in your dashboard or when editing the tag.

It's the number that comes after: `tag_ID=`

= Is it possible to display a subcategory underneath its parent? =
No, this is not possible. Parent and subcategories are displayed separately.

= Is a post without a title also displayed? =
Yes, it will be displayed in the frontend of your website with a default label. You can change this label by using an attribute.

= Why is there no semantic versioning? =
The version number won't give you info about the type of update (major, minor, patch). You should check the changelog to see whether or not the update is a major or minor one.

= How can I make a donation? =
You like my plugin and want to make a donation? There's a PayPal donate link at my website. Thank you!

= Other questions or comments? =
Please open a topic in the WordPress.org support forum for this plugin.


== Changelog ==
= Version 7.5 =
* New: set number of columns via the block settings, instead of using an attribute

= Version 7.4 =
* Changed several attribute names, to make it more clear for users
* This means you might have to update your attributes
* Attribute posts_per_page becomes posts_per_category
* Attribute description becomes category_description
* Attribute count becomes post_count
* Attribute meta becomes post_meta
* Attribute no_title_label becomes no_post_title_label
* Attribute all_link becomes view_all_link
* Attribute all_link_label becomes view_all_link_label
* Minor changes in code

= Version 7.3 =
* Changed plugin description

= Version 7.2 =
* New: VS Knowledge Base block
* Block editor users can now replace their shortcode block with the VS Knowledge Base block

= Version 7.1 =
* Minor changes in code

= Version 7.0 =
* Added extra validation for category query
* Minor changes in code

= Version 6.9 =
* Bumped the "requires PHP" version to 7.0
* Bumped the "requires at least" version to 5.0

= Version 6.8 =
* New: disable columns in widget
* This can be useful for your own styling
* Was already possible when using the shortcode
* Minor changes in code

= Version 6.7 =
* Minor changes in code

= Version 6.6 =
* Minor changes in code

For all versions please check file changelog.


== Upgrade Notice ==
= 7.5 =
* Changed several attribute names in version 7.4, to make it more clear for users. For more info please check changelog at plugin page.

= 7.4 =
* Changed several attribute names in version 7.4, to make it more clear for users. For more info please check changelog at plugin page.


== Screenshots ==
1. Knowledge Base (GeneratePress theme)
2. Knowledge Base WooCommerce products (GeneratePress theme)
3. Block (dashboard)
4. Widget (dashboard)