<?php

// Function to categorize a given token into different types
function categorizeToken($token)
{
    // Check if the token is a programming keyword
    if (preg_match('/\b(?:for|int|if|while|else|auto|break|case|char|const|continue|default|do|double|enum|extern|float|goto|long|register|return|short|signed|sizeof|static|struct|switch|typedef|union|unsigned|void|volatile|string)\b/', $token)) {
        return "Keyword";
    } 
    // Check if the token is a numeric value
    elseif (is_numeric($token)) {
        return "Numeral";
    } 
    // Check if the token contains special characters or symbols
    elseif (preg_match('/[^\s\w]/', $token)) {
        return "Special Characters/Symbol";
    } 
    // Check if the token is a valid identifier
    elseif (preg_match('/^[a-zA-Z_]+[a-zA-Z0-9_]*$/', $token)) {
        return "Identifiers";
    } 
    // If the token doesn't match any known pattern, categorize it as an unknown value
    else {
        return "Unknown Value";
    }
}

// Function A: Parses 'a' characters recursively
function A($s, $i) {
    if ($i < strlen($s) && $s[$i] == 'a') {
        $i++;
        $i = A($s, $i);
    }
    return $i;
}

// Function B: Parses 'b' characters recursively
function B($s, $i) {
    if ($i < strlen($s) && $s[$i] == 'b') {
        $i++;
        $i = B($s, $i);
    }
    return $i;
}

// Function D: Parses 'd' characters recursively
function D($s, $i) {
    if ($i < strlen($s) && $s[$i] == 'd') {
        $i++;
        $i = D($s, $i);
    }
    return $i;
}

// Function to print "String is valid"
function valid() {
    echo "\nString is valid\n";
}

// Function to print "String is invalid"
function invalid() {
    echo "\nString is invalid\n";
}

// Main function for token categorization
function mainTokenCategorization() {
    echo "Enter your code: ";
    $inputProgram = trim(fgets(STDIN));

    // Using a regular expression to tokenize the input
    preg_match_all('/\b(?:for|int|if|while|else|auto|break|case|char|const|continue|default|do|double|enum|extern|float|goto|long|register|return|short|signed|sizeof|static|struct|switch|typedef|union|unsigned|void|volatile|string)\b|\w+|[^\s\w]/', $inputProgram, $matches);
    $inputProgramTokens = $matches[0];

    // Iterate through each token and categorize it, then display the result
    foreach ($inputProgramTokens as $token) {
        $category = categorizeToken($token);
        echo "$token --------> $category\n";
    }
}

// Main function for string validation based on grammar rules
function mainStringValidation() {
    // Display the grammar rules
    echo "Grammar:\n";
    echo "S -> ABD\n";
    echo "A -> aA | ε\n";
    echo "B -> bB | ε\n";
    echo "D -> dD | ε\n";

    // Prompt the user to enter a string
    $s = readline("Enter the String:\n");
    $i = 0;

    // Parse the string using grammar rules
    $i = A($s, $i);
    $i = B($s, $i); 
    $i = D($s, $i);

    // Check if the parsing index is at the end of the string
    if ($i == strlen($s)) {
        valid(); // If so, the string is valid
    } else {
        invalid(); // Otherwise, the string is invalid
    }
}

// Call the main function based on user choice
echo "Choose an option:\n1. Lexical Analysis\n2. Syntax Analysis\n";
$choice = intval(trim(fgets(STDIN)));

if ($choice === 1) {
    mainTokenCategorization();
} elseif ($choice === 2) {
    mainStringValidation();
} else {
    echo "Invalid choice.\n";
}
?>
