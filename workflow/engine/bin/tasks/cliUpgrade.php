<?php
/**
 * cliUpgrade.php
 *
 * ProcessMaker Open Source Edition
 * Copyright (C) 2011 Colosa Inc.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * For more information, contact Colosa Inc, 2566 Le Jeune Rd.,
 * Coral Gables, FL, 33134, USA, or email info@colosa.com.
 *
 * @author Alexandre Rosenfeld <alexandre@colosa.com>
 * @package workflow-engine-bin-tasks
 */

G::LoadClass("system");
G::LoadClass("wsTools");

CLI::taskName('upgrade');
CLI::taskDescription(<<<EOT
  Upgrade workspaces.

  This command should be run after ProcessMaker files are upgraded so that all
  workspaces are upgraded to the current version.
EOT
);
CLI::taskRun(run_upgrade);


/**
 * A version of rm_dir which does not exits on error.
 *
 * @param  string $filename directory or file to remove
 * @param  bool $filesOnly either to remove the containing directory as well or not
 */
function rm_dir($filename, $filesOnly = false) {
  if (is_file($filename)) {
    @unlink($filename) or CLI::logging(CLI::error("Could not remove file $filename")."\n");
  } else {
    foreach(glob("$filename/*") as $f) {
      rm_dir($f);
    }
    if (!$filesOnly)
      @rmdir($filename) or CLI::logging(CLI::error("Could not remove directory $filename")."\n");
  }
}

function run_upgrade($command, $args) {
  CLI::logging("UPGRADE", PROCESSMAKER_PATH . "upgrade.log");
  CLI::logging("Checking files integrity...\n");
  $checksum = System::verifyChecksum();
  if ($checksum === false) {
    CLI::logging(CLI::error("checksum.txt not found, integrity check is not possible") . "\n");
    if (!CLI::question("Integrity check failed, do you want to continue the upgrade?")) {
      CLI::logging("Upgrade failed\n");
      die();
    }
  } else {
    if (!empty($checksum['missing'])) {
      CLI::logging(CLI::error("The following files were not found in the installation:")."\n");
      foreach($checksum['missing'] as $missing) {
        CLI::logging(" $missing\n");
      }
    }
    if (!empty($checksum['diff'])) {
      CLI::logging(CLI::error("The following files have modifications:")."\n");
      foreach($checksum['diff'] as $diff) {
        CLI::logging(" $diff\n");
      }
    }
    if (!(empty($checksum['missing']) || empty($checksum['diff']))) {
      if (!CLI::question("Integrity check failed, do you want to continue the upgrade?")) {
        CLI::logging("Upgrade failed\n");
        die();
      }
    }
  }
  CLI::logging("Clearing cache...\n");
  if(defined('PATH_C'))
    rm_dir(PATH_C, true);
  $workspaces = get_workspaces_from_args($args);
  $count = count($workspaces);
  $first = true;
  foreach ($workspaces as $index => $workspace) {
    try {
      CLI::logging("Upgrading workspaces ($index/$count): " . CLI::info($workspace->name) . "\n");
      $workspace->upgrade($first);
      $workspace->close();
      $first = false;
    } catch (Exception $e) {
      CLI::logging("Errors upgrading workspace " . CLI::info($workspace->name) . ": " . CLI::error($e->getMessage()) . "\n");
    }
  }
  CLI::logging("Upgrade successful\n");
}

?>
