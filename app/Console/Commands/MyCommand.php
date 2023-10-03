<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Compte puis trie les occurences de mots dans un fichier texte';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $allTheText = file_get_contents(dirname(__FILE__) . "/../../../resources/my_text.txt");
        $lines = explode("\n", $allTheText);
        $words = $lineWords = [];
        
        $numberOfLines = count($lines);
        for ($i = 0; $i < $numberOfLines; $i++) {
            $lineWords[] = explode(" ", $lines[$i]);
        }

        $numberOfLineWords = count($lineWords);
        for ($j = 0; $j < $numberOfLineWords; $j++) {
            $line = $lineWords[$j];
            foreach ($line as $word) {
                $words[] = $word;
            }
        }

        $numberOfWords = count($words);
        // Remove special chars
        foreach (str_split(",.?;!:") as $char) {
            for ($k = 0; $k < $numberOfWords; $k++) {
                $words[$k] = strtolower($words[$k]);
                $words[$k] = str_replace($char, "", $words[$k]);
                // Can unset empty word here but need to loop through array with another method
            }
        }

        // unset($word); // todo: don't remove // I did.

        foreach ($words as $i => $word) {
            if (empty($word)) {
                unset($words[$i]);
            }
        }

        $classement = [];
        // Count each occurencies
        foreach ($words as $word) {
            if (!isset($classement[$word])) {
                $classement[$word] = 1;
            } else {
                $classement[$word]++;
            }
        }

        // Sort by value (count), DESC
        arsort($classement);

        $newClassement = [];
        foreach ($classement as $word => $count) {
            $newClassement[] = [
                "word" => $word,
                "count" => $count,
            ];
        }
        // Removed "break after 10 elements" to display everything

        // Display it nicely
        foreach ($newClassement as $position => $wordData) {
            $mot = $wordData["word"];
            $nombre = $wordData["count"];
            $thePosition = $position + 1;

            echo "$thePosition: $mot avec $nombre\n";
        }
    }
}
