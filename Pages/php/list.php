<?php $res = $Request->GetTokenList();

function secure($val)
{
    return (is_array($val)) ? array_map('secure', $val) : htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

$response = secure($res);
?>

<body>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mono</th>
                <th scope="col">IS_expired</th>
                <th scope="col">Token</th>
            </tr>
        </thead>
        <?php foreach ($response as $key => $item) {?>
        <tbody>
            <tr>
                <th scope="row"><?php print_r($key)?></th>
                <td class="font-monospace"><?php print_r($item['memo'])?></td>
                <td
                    class="font-monospace <?php print_r(($item['is_expired'] == 1 ? "text-bg-danger" : "text-bg-success"))?> ">
                    <?php print_r(($item['is_expired'] == 0 ? 'No' : 'Yes'))?></td>
                <td class="font-monospace" id="<?php print_r($key)?>"><?php print_r($item['login_token'])?></td>
                <td class="col-2">
                    <button onclick="CopyToClipboard(<?php print_r($key)?>)" class="p-m-1 btn btn-outline-dark"
                        type="submit">
                        Copy Token
                    </button>
                    <a href="?del&steamid=<?php print_r($item['steamid'])?>"><button
                            class="p-m-1 btn btn-warning link-danger" type="submit">
                            Delete
                        </button></a>
                    <a href="?regen&steamid=<?php print_r($item['steamid'])?>"><button
                            class="p-m-1 btn btn-dark link-success" type="submit">
                            Regenerate
                        </button></a>
                </td>
            </tr>
        </tbody>
        <?php }?>
    </table>
</body>

</html>