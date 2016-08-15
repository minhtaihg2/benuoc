<?php
// Get all members from JSON file
$members = json_decode(file_get_contents('data/data2.json'))->members;
// Get a random key of the array
$members_count = count($members);
$loop = $members_count * 10;
$randoms = [];
for ($i = 0; $i < $loop; $i++) {
    $value = rand(0, $members_count - 1);
    if (! isset($randoms[$value])) {
        $randoms[$value] = 1;
    } else {
        $randoms[$value]++;
    }
}
$randomKey = array_search(max($randoms), $randoms);

// We update the statistics
$members[$randomKey]->times++;

// And put the updated info into JSON file
file_put_contents('data/data2.json', json_encode(array('members' => $members)));

echo json_encode(array('data' => array(
    'key' => $randomKey,
    'members' => $members[$randomKey]
)));

exit;
