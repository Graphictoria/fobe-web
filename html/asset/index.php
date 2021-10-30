<?php

header("Cache-Control: no-cache");
header("Pragma: no-cache");
header("Expires: -1");
header("Last-Modified: " . gmdate("D, d M Y H:i:s T") . " GMT");

$id = (int)$_GET["id"];
$assetversionid = (int)$_GET["assetversionid"];
$version = (int)$_GET["version"];

$assetversion = 0;
if ($assetversionid)
{
    $assetversion = $assetversionid;
}
else if ($version)
{
    $assetversion = $version;
}

function ReturnAsset($hash, $assettypeid) //this determines which cdn to grab an asset request from
{
	if ($assettypeid == 1) //handle image assets (stored on the thumb cdn)
	{
		ReturnThumbnailFromHash($hash);
	}
	else
	{
		ReturnAssetFromHash($hash);
	}
}

$websettings = $pdo->prepare("SELECT * FROM websettings");
$websettings->execute();
$websettings = $websettings->fetch(PDO::FETCH_OBJ);
	
if ($id)
{
	$iteminfo = getAssetInfo($id);
	if($iteminfo !== FALSE) //asset id exists in alphaland db
	{
		if (isAssetApproved($id) and !isAssetModerated($id)) //if the asset is approved and not moderated
		{
			if (RCCHeaderEnvironment(true)) //immediately allow full access (passing true disables die() and returns true or false)
			{
				ReturnAsset($iteminfo->Hash, $iteminfo->AssetTypeId);
			}
			else
			{
				if(isLoggedIn())
				{
					if ($iteminfo->IsPublicDomain == true or $iteminfo->CreatorId == $user->id or $user->isOwner())
					{
						ReturnAsset($iteminfo->Hash, $iteminfo->AssetTypeId);
					}
				}
			}
		}
		die(http_response_code(401)); //unauthorized
	}
	else //fallback to roblox assets (compatibility)(will break eventually, need a better solution)(instruct players to use roblox asset url for compatibility?) roblox.com/asset/?id=
	{
		redirect("https://assetdelivery.roblox.com/v1/asset/?id=" . $id . "&version=" . $assetversion);
	}
}
