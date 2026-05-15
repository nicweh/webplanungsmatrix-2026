// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle. If not, see <https://www.gnu.org/licenses/>.

/**
 * Modal for creating a new planning matrix.
 *
 * @module      local_planmatrix/new_matrix_modal
 * @copyright   2026 Nicole Wehrlein <nicole.wehrlein@gmx.de>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Finalisieren Modal → Moodle-Formular → JavaScript sammelt Formulardaten → core/ajax → external API → $DB->insert_record()

define([
    'jquery',
    'core/modal_factory',
    'core/modal_events',
    'core/fragment',
    'core/str'
], function($, ModalFactory, ModalEvents, Fragment, Str) {

    /**
     * Initialise the modal.
     * Modal "Neue Planungsmatrix erstellen."
     */
    const init = function() {
        $('[data-action="open-new-planmatrix-modal"]').on('click', function(e) {
            e.preventDefault();

            Promise.all([
                Str.get_string('newmatrix', 'local_planmatrix'),
                Str.get_string('create', 'local_planmatrix'),
                Fragment.loadFragment(
                    'local_planmatrix',
                    'new_matrix_form',
                    1,
                    {}
                )
            ]).then(function(results) {
                const title = results[0];
                const createText = results[1];
                const body = results[2];

                return ModalFactory.create({
                    type: ModalFactory.types.SAVE_CANCEL,
                    title: title,
                    body: body
                }).then(function(modal) {
                    modal.setSaveButtonText(createText);
                    return modal;
                });
            }).then(function(modal) {
                modal.getRoot().on(ModalEvents.save, function(e) {
                    e.preventDefault();

                    const form = modal.getRoot().find('form');

                    window.console.log(form.serializeArray());

                    modal.hide();
                });

                modal.getRoot().on(ModalEvents.hidden, function() {
                    modal.destroy();
                });

                modal.show();

                return modal;
            }).catch(function(error) {
                window.console.error(error);
            });
        });
    };

    return {
        init: init
    };
});