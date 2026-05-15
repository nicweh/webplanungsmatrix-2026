<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Main file to view greetings
 *
 * @package     local_planmatrix
 * @copyright   2026 Nicole Wehrlein <nicole.wehrlein@gmx.de>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

function local_planmatrix_output_fragment_new_matrix_form($args) {
    global $PAGE;

    require_login();

    $context = context_system::instance();
    require_capability('local/planmatrix:create', $context);

    $args = (object) $args;

    $PAGE->set_context($context);

    $form = new \local_planmatrix\form\new_matrix_form(
        new moodle_url('/local/planmatrix/edit.php'),
        [
            'context' => $context,
        ]
    );

    ob_start();
    $form->display();
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}


/**
 * Insert a link to index.php on the site front page navigation menu.
 *
 * @param navigation_node $frontpage Node representing the front page in the navigation tree.
 */
function local_planmatrix_extend_navigation_frontpage(navigation_node $frontpage) {
    $frontpage->add(
        get_string('pluginname', 'local_planmatrix'),
        new moodle_url('/local/planmatrix/index.php'),
        navigation_node::TYPE_CUSTOM,
    );
}