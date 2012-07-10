# SyndExtrasBundle

This is a collection of small tweaks to Symfony2.

## EntityAwareUrlGenerator

All URL generator calls now accept an Entity object to prevent stuff like this:

    {{ path('view_object', { id: obj.id }) }}
    {{ path('view_object', { id: obj.id, obj.nameCanonical}) }}

Instead, simply:

    {{ path('view_object', obj) }}

Your entity can either supply an `toArray` method, otherwise it will attempt to find the matching methods automatically. Cache will need to be cleared for this to take effect.
