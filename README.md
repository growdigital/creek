creeky
======

Creek Creative WordPress website theme.

This work is licensed under the Creative Commons Attribution-ShareAlike 3.0 Unported License.
To view a copy of this license, visit <http://creativecommons.org/licenses/by-sa/3.0/deed.en_US>

1. Pattern Lab
* Suit CSS
* Gulp
* Myth
* Handlebars
* EditorConfig

## Gulp

### Installation

### Building

    % gulp

If you create new patterns in patternlab, you may need to restart gulp

##

## Suit CSS

https://github.com/suitcss/suit

### Suit CSS syntax

#### Utilities

* Low-level structural, positional, and visual traits.
* Must use camelCase name.
* Syntax `u-<utilityName>`

#### Components

* UI patterns
* Syntax: `[<namespace>-]<ComponentName>[-descendantName|--modifierName]`
* `ComponentName` in PascalCase
* `ComponentName--modifierName` in camelCase, separated by 2 hyphens.
* `ComponentName-descendantName` in camelCase, separated by 1 hyphen.
* `ComponentName.is-stateOfComponent` state-based modifications of components. JS can add/remove these classes. Are scoped to component.

#### Other

* `v[n]-utilityName` or `v[n]-ComponentName` scope styles to a Media Query breakpoint.
* `js-someName` - `id` & `js-*` reserved for JavaScript. Application specific data stored in `data-*` attributes.


### Suit CSS comments

```
/* ==========================================================================
   Component Name - title
   ========================================================================== */

/**
 * Heading in comments
 */

 /* Single line comment */
```
