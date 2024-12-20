<?php

error_reporting(E_ALL);

function exit_command() {
    exit(0);
};

function echo_command($input) {
    fwrite(STDOUT, str_replace("$", "", implode(" ", $input)));
};

function main() {
    fwrite(STDOUT, "$ ");

    $userInput = fgets(STDIN);

    $availableCommands = ["exit", "echo"];

    $userInput = rtrim($userInput, "\n");

    if ($userInput) {
        $commandArray = explode(" ", $userInput);

        if ($commandArray[0] && !in_array($commandArray[0], $availableCommands)) {
            fwrite(STDOUT, $commandArray[0] . ": command not found\r\n");
        }else {
            call_user_func($commandArray[0] . "_command", array_slice($commandArray, 1));
        }
    }
}

main();