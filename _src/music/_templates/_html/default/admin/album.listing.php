<tr id="tr{album_key}" >
	<td><a href="{URL}/admin/album/?action=edit&r={album_key}">{album_name}</a></td>
    <td>{album_tracks}</td>
    <td>{art_name}</td>
    <td>{album_status}</td>
    <td><a href="{URL}/admin/album/?action=edit&r={album_key}" class="tiptip-top" title="Add Tracks into this Album">Update & Songs</a> | <a href="Javascript:void(0);" onclick="fast_delete('admin/album/delete','{album_key}','tr{album_key}');">Delete</a> </td>
</tr>