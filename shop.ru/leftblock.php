<div class = "leftblock">  
        <?php $categories = get_categories(); ?>
        <?php if ($user_role['role'] == 1): ?>
         <div class="action"><a  href="add_category.php"> Добавить </a></div><br><br>     
         <?php endif; ?>
         <table class="edit">
         <?php foreach($categories as $category): ?> <tr>  
        <td>
                <a href="/category.php?id=<?=$category['id']?>"><?=$category["title"]?></a>
        </td>
        <td>
                <?php if ($user_role['role'] == 1): ?>
                <a  href="/edit.php?edit_category=<?=$category['id']?>"><img class="edit" src="images/edit.png"></a>
                <?php endif; ?>
        </td>
</tr>
        <?php endforeach; ?>        
         </table>
</div>