<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
    <head>
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
      <link rel="stylesheet" href="cssfiles/a.css" /> -->
      <link rel="stylesheet" href="cssfiles/a.css" />
        <link rel="stylesheet" href="cssfiles/css_about_contact.css" />
    <!-- icon link -->
    <link rel="icon" href="images/forumlogo.png" type="image/icon type" />
    <title>Events</title>
    </head>
  <body>
  <div class="container">
        <div class="jumbotron jumbotron-fluid glassdiv-artt mantine">
            <div class="container d-flex justify-content-center align-item-center my-4 DIV_content card-body artt " style="flex-direction:column;">
    <h1 class="display-4 heading_page">Ask Me Anything Session</h1>
    <hr class="hr_styl" />
    <br />
    <br />
  
    <table border="1" >
      <tr bgcolor="#9acd32">
        <th class="button ttt">Title</th>
        <th class="button ttt">Price</th>
        <th class="button ttt">Company</th>


        <th class="button ttt">Event Host</th>
      </tr>
      <xsl:for-each select="catalog/cd">
      <xsl:sort select="price" order="descending"/>
      <tr>
        <td class="ttt"><xsl:value-of select="title"/></td>
        <td class="ttt"><xsl:value-of select="price"/></td>
        <td class="ttt"><xsl:value-of select="company"/></td>
        <td class="ttt"><xsl:value-of select="artist"/></td>
        
      </tr>
      </xsl:for-each>
    </table>

  </div>
  </div>
  </div>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>