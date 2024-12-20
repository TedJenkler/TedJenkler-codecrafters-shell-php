<?php

error_reporting(E_ALL);

function main() {
    fwrite(STDOUT, "$ ");

    $userInput = fgets(STDIN);

    $availableCommands = ["exit"];

    $userInput = rtrim($userInput, "\n");

    if ($userInput) {
        $commandArray = explode(" ", $userInput);

        if ($commandArray[0] && !in_array($commandArray[0], $availableCommands)) {
            fwrite(STDOUT, $commandArray[0] . ": command not found\r\n");
        }else {
            call_user_func($commandArray[0] . "_command");
        }
    }

    main();
}

main();

function exit_command() {
    exit(0);
};