{* Smarty *}

<!DOCTYPE html>
<html lang="en">

<head>
    {include 'head.tpl'}
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
        {* {foreach $response as $key => $item}  *}
            <tbody>
                <tr>
                    <th scope="row">
                        1
                    </th>
                    <td class="font-monospace ">
                        <abbr title="{appidtoName(730)}">

                            730
                        </abbr>
                    </td>
                    <td class="font-monospace">
                        TEST
                    </td>
                    {* <td class="font-monospace <?=say(($item['is_expired'] == 1 ? " text-bg-danger" : "text-bg-success" ))?> *}
                    <td class="font-monospace text-bg-danger">
                        yes
                    </td>
                    <td class="font-monospace" id="1">
                        UwU
                    </td>
                    <td class="col-2">
                        <button onclick="CopyToClipboard(1)" class="p-m-1 btn btn-outline-dark" type="submit">
                            Copy Token
                        </button>
                        <a href="?del&steamid=<?=say($item['steamid'])?>"><button class="p-m-1 btn btn-warning link-danger"
                                type="submit">
                                Delete
                            </button></a>
                        <a href="?regen&steamid=<?=say($item['steamid'])?>"><button class="p-m-1 btn btn-dark link-success"
                                type="submit">
                                Regenerate
                            </button></a>
                    </td>
                </tr>
            </tbody>
        {* {/foreach} *}
    </table>
</body>


</html>