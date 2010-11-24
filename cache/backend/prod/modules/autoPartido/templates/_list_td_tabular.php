<td class="sf_admin_text sf_admin_list_td_nombre">
  <?php echo link_to($partido->getNombre(), 'partido_edit', $partido) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_sigla">
  <?php echo $partido->getSigla() ?>
</td>
