<table class="responsive" width="100%">

  <tr>

    <td>

      Libros

    </td>

  </tr>

  <?php

  foreach ($models as  $value)

  {

   ?>

  <tr>

    <td>

      <?= $value->book->name ?>

    </td>

  </tr>

  <?php

  }

  ?>

</table>