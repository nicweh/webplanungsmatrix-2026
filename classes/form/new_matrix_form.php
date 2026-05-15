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
 * Main file to view planmatrix
 *
 * @package     local_planmatrix
 * @copyright   2026 Nicole Wehrlein <nicole.wehrlein@gmx.de>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_planmatrix\form;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');

class new_matrix_form extends \moodleform {

    public function definition() {
        $mform = $this->_form;

        $mform->addElement(
            'text',
            'title',
            get_string('title', 'local_planmatrix')
        );
        $mform->setType('title', PARAM_TEXT);
        $mform->addRule(
            'title',
            get_string('required'),
            'required',
            null,
            'client'
        );

        $mform->addElement(
            'text',
            'kurs',
            get_string('kurs', 'local_planmatrix'),
        );
        $mform->setType('kurs', PARAM_TEXT);

        $mform->addElement('hidden', 'sesskey', sesskey());
        $mform->setType('sesskey', PARAM_ALPHANUMEXT);

       // $this->add_action_buttons(true, get_string('save'));

        $mform->addElement(
            'text',
            'contributors',
            get_string('contributors', 'local_planmatrix'),
        );
        $mform->setType('contributors', PARAM_TEXT);

        $mform->addElement('hidden', 'sesskey', sesskey()
        );
        $mform->setType('sesskey', PARAM_ALPHANUMEXT);
    }

    public function validation($data, $files) {
        $errors = parent::validation($data, $files);

        if (trim($data['topic']) === '') {
            $errors['topic'] = get_string('required');
        }

        return $errors;
    }
}
