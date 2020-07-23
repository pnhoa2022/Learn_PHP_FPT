<?php

echo '<ul>';


foreach ($Notes as $Note) {
    $Title = $Note->Title;
    $IDNote = $Note->IDNote;

    echo <<<_END
<li>
    <a href="?controller=Notes&action=show&IDNote=$IDNote">
        $Title
    </a>
</li>
_END;

}

echo '</ul>';

?>