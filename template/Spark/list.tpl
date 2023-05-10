{* Smarty *}

<!DOCTYPE html>
<html lang="en">

<head>
    {include 'head.tpl'}
    <script src="./template/Spark/assets/js/Script.js"></script>
</head>

<body>
    {include 'header.tpl'}
    <table id="txt-white" class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">appId</th>
                <th scope="col">Memo</th>
                <th scope="col">IS_expired</th>
                <th scope="col">Token</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        {foreach $List as $key => $item}
            <tbody>
                <tr>
                    <th scope="row">
                        {$key}
                    </th>
                    <td class="font-monospace ">
                        <abbr title="{appidtoName({$item['appid']})}">
                            {$item['appid']}
                        </abbr>
                    </td>
                    <td class="font-monospace">
                        {$item['memo']}
                    </td>
                    <td
                        class="font-monospace {if {$item['is_expired']} == true} text-bg-danger {else} text-bg-success {/if}">
                        {if {$item['is_expired']} == true} YES {else} NO {/if}
                    </td>
                    <td class="font-monospace" id="{$key}">
                        {$item['login_token']}
                    </td>
                    <td class="col-2">
                        <button onclick="CopyToClipboard({$key})" class="p-m-1 btn btn-outline-dark" type="submit">
                            Copy Token
                        </button>
                        <a href="action?a=remove&steamId={$item['steamid']}">
                            <button class="p-m-1 btn btn-warning link-danger" type="submit">
                                Delete
                            </button>
                        </a>
                        <a href="action?a=renew&steamId={$item['steamid']}">
                            <button class="p-m-1 btn btn-dark link-success" type="submit">
                                Regenerate
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
        {/foreach}
    </table>
</body>


</html>