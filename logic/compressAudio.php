<?php

// Define the compressAudio function
function compressAudio($sourceFile, $destinationFile) {
    // Command to compress audio using FFmpeg with a higher bitrate (128kbps)
    // Adjust the bitrate as needed for your requirements
    $command = "ffmpeg -i $sourceFile -b:a 128k $destinationFile";

    // Execute the FFmpeg command
    exec($command, $output, $returnCode);

    // Check if FFmpeg command executed successfully
    if ($returnCode === 0 && file_exists($destinationFile)) {
        return $destinationFile; // Return the path to the compressed audio file
    } else {
        return false; // Compression failed, return false
    }
}
