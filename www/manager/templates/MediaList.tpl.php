<?php
$addMediaURL = UNL_MediaHub_Manager::getURL().'?view=addmedia';
if (isset($_GET['id'])) {
    $addMediaURL .= '&amp;feed_id='.$_GET['id'];
}
$url = UNL_MediaHub_Manager::getURL(null, array_merge($context->options, array('page'=>'{%page_number}')));
?>
<div class="group">
	<h3>Media in this Channel</h3>
	<a class="add_media" title="Add media to this feed" href="<?php echo $addMediaURL; ?>">Add media</a>
</div>
<?php
if (count($context->items)) {
    $pager_layout = new UNL_MediaHub_List_PagerLayout($context->pager,
        new Doctrine_Pager_Range_Sliding(array('chunk'=>5)),
        $url);
    $pager_links = $pager_layout->display(null, true);
    echo '<ul class="medialist">';
    foreach ($context->items as $media) { ?>
        <li>
            <a href="<?php echo UNL_MediaHub_Controller::getURL($media); ?>"><img class="thumbnail" src="<?php echo $media->getThumbnailURL(); ?>" alt="Thumbnail preview for <?php echo htmlentities($media->title, ENT_QUOTES); ?>" width="100" height="76" /></a>
            <div class="actions">
            <a href="<?php echo $addMediaURL; ?>&amp;id=<?php echo $media->id; ?>">Edit</a>
            <?php
            echo $savvy->render($media, 'Media/DeleteForm.tpl.php');
            ?>
            </div>
            <div class="metaInfo">
            <h4><a href="<?php echo UNL_MediaHub_Controller::getURL($media); ?>"><?php echo htmlspecialchars($media->title); ?></a></h4>
            <?php
            $element = $media->datecreated;
                    echo '<h6 class="subhead">Added on '.date("F j, Y, g:i a", strtotime($element)).'</h6>';
                    
            $summary = $media->description;
            if ($element = UNL_MediaHub_Feed_Media_NamespacedElements_itunes::mediaHasElement($media->id, 'summary')) {
                $summary .= '<span class="itunes_summary">'.$element->value.'</span>';
            }
            $summary = strip_tags($summary, '<a><img>');
            $summary = str_replace('Related Links', '', $summary);
            ?>
            <p><?php echo $summary; ?></p>
            </div>
        </li>
    <?php  
    } 
    echo '</ul>';
    ?>
    <em>Displaying <?php echo $context->first; ?> through <?php echo $context->last; ?> out of <?php echo $context->total; ?></em>
    <?php echo $pager_links;
} else {
    echo '<p>This channel has no media yet.</p>';
}
?>

