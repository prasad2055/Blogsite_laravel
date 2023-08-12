<?php if($pages > 1): ?>
<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item <?php echo $pageNo == 1 ? 'disabled' : ''; ?>">
      <a class="page-link" <?php echo $pageNo > 1 ? 'href=' .$url.'?page='.($pageNo - 1) : ''; ?>>Previous</a>
    </li>

    <?php for($i = 1; $i <= $pages; $i++): ?>
    <li class="page-item <?php echo $pageNo == $i ? 'active' : ''; ?>"><a class="page-link" href="<?php echo "{$url}?page={$i}"; ?>"><?php echo $i ?></a></li>
    <?php endfor; ?>
    
    <li class="page-item <?php echo $pageNo == $pages ? 'disabled' : ''; ?>">
      <a class="page-link" <?php echo $pageNo < $pages ? 'href=' .$url.'?page='.($pageNo + 1) : ''; ?>>Next</a>
    </li>
  </ul>
</nav>
<?php endif; ?>