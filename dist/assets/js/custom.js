/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

'use strict';

var Scrollbar = window.Scrollbar;

Scrollbar.use(window.OverscrollPlugin)

var options = {
    damping: 0.1,
    alwaysShowTracks: true,
    enable: true,
    plugins: {
        overscroll: {
            effect: 'glow',
            glowColor: '#fffddf',
            damping: 0.1,
            maxOverscroll: 100,
        }
    }
}

Scrollbar.init(document.querySelector('body'), options);
