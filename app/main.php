<?php

error_reporting(E_ALL);

function main() {
    fwrite(STDOUT, "$ ");

    $userInput = fgets(STDIN);

    $availableCommands = [];

    $userInput = rtrim($userInput, "\n");

    if ($userInput) {
        $commandArray = explode(" ", $userInput);

        if ($commandArray[0] && !in_array($commandArray[0], $availableCommands)) {
            fwrite(STDOUT, $commandArray[0] . ": command not found\r\n");
        }
    }

    main();
}

main();