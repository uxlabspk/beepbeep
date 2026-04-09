        </div><!-- end page content -->
      </div><!-- end flex row -->
    </div><!-- end container -->
  </section>
</main>

<script>
  // Generic confirm-delete for data-confirm buttons
  document.querySelectorAll('[data-confirm]').forEach(el => {
    el.addEventListener('click', function(e) {
      if (!confirm(this.dataset.confirm || 'Are you sure?')) e.preventDefault();
    });
  });
</script>

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
