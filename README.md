# eCSStractor

Extracts CSS from HTML `<style>`-Tags

*(Also the lamest wordplay I could possibly come up with...)*


## How

### Installation

*still to come* 

### Usage

```php
//Your HTML-Document with one or more <style>-Tags
$html = '<html><head><style>p { color: blue; }</style></head>...<style>h1 { background-color: green; }</style></html>'; 
$eCSStractor = new eCSStractor();
$css = $eCCStractor->extract($html);

header("Content-type: text/css");
echo $css;
```

```css
p { color: blue; }
h1 { background-color: green; }
```

### Example

Check out the `example/` directory. The styles from `input.html` are extracted in `css.php` and used in `usage.html`.

## What not

This doesn't optimize the styles. [GIGO](https://en.wikipedia.org/wiki/Garbage_in,_garbage_out) ;)

## Why

I built a tool to send newsletters with. The [editor](http://ckeditor.com/) for the newsletter-content had to be able to work with multiple templates (each containing unique styles). By extracting the styles from the templates I was able to dynamically change the template for a preview (outside the editor) and the styles in the editor accordingly.

Before sending the newsletter the styles are [written inline](http://templates.mailchimp.com/resources/email-client-css-support/) by [emogrifier](https://github.com/jjriv/emogrifier) so there was no need to change anyting.