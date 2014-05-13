# SUIT CSS

## Design principles

1. Single responsibility principle
* Extension over direct modification
* Composition over inheritance
* Low coupling
* Encapsulation
* Documentation

## Naming conventions

* Structured class names & meaningful hyphens
* Division between utilities & components

### Utilities

* Low-level structural, positional, and visual traits.
* Must use camelCase name.
* Syntax `u-<utilityName>`

### Components

* UI patterns
* Syntax: `[<namespace>-]<ComponentName>[-descendantName|--modifierName]`
* `ComponentName` in PascalCase
* `ComponentName--modifierName` in camelCase, separated by 2 hyphens.
* `ComponentName-descendantName` in camelCase, separated by 1 hyphen.
* `ComponentName.is-stateOfComponent` state-based modifications of components. JS can add/remove these classes. Are scoped to component.

### Other

* `v[n]-utilityName` or `v[n]-ComponentName` scope styles to a Media Query breakpoint. Eg:

`<div class="v2-u-before1of4 v3-u-before1of3">...</div>`

* `js-someName` - `id` & `js-*` reserved for JavaScript. Application specific data stored in `data-*` attributes.

## Utilities

* Structural, positional & visual traits.
* Viewport-size agnostic
* Side step specificity issues by adding HTML:
`<a href="{url}">
  <span class="u-textMute">…</span>
</a>`

## Components

* Specific HTML structure & associated CSS
* Core class name reserves namespace
* One pattern, one component, one file

### Component documentation

* What is the component for?
* How should it be used?
* What is the HTML template for this component?
* What are the modifiers?
* What are the known limitations?

### Nesting components

* A component should wrap a nested component in an element
* Wrapping element controls positioning.
* Inheritable styles can be applied to wrapper.

        <article class="Excerpt u-cf">
            {{! other implementation details }}
            <div class="Excerpt-wrapButton">
            <button class="Button Button--default" type="button">{{button_text}}</button>
            </div>
        </article>

### Use partials and template inheritance

* Rely on HTML templating and template inheritance to hide implementation details.
* You can make parts of a partial configurable from the inherited context.
