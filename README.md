# DataCache
Cache Frequently Accessed Data on Disk


# Usage

    $file = "my-cache-file"; // File to Use for Cache
    $time = "300"; // Seconds to Cache For
    
    $cache = new DataCache($file, $time);
    $data = $cache->read();

    // Output Cached Version if present
    if ($data) {
        die($data);
    }

    // Write to Cache and Output of not present
    $data = rand(1,15);
    $cache->write($data);
    die($data);
