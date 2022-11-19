<?php $response = $Request->GetTokenList();
// var_dump($response);
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
                <th scope="row"><?php print $key ?></th>
                <td class="font-monospace"><?php print $item['memo'] ?></td>
                <td
                    class="font-monospace <?php print($item['is_expired'] == 1 ? "text-bg-danger" : "text-bg-success") ?> ">
                    <?php print($item['is_expired'] == 0 ? 'No' : 'Yes') ?></td>
                <td class="font-monospace" id="<?php print $key ?>"><?php print $item['login_token'] ?></td>
                <td class="col-2">
                    <button onclick="CopyToClipboard(<?php print $key ?>)" class="p-m-1 btn btn-outline-dark"
                        type="submit">
                        Copy Token
                    </button>
                    <a href="?del&steamid=<?php print $item['steamid'] ?>"><button
                            class="p-m-1 btn btn-warning link-danger" type="submit">
                            Delete
                        </button></a>
                    <a href="?regen&steamid=<?php print $item['steamid'] ?>"><button
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