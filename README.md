# EV CW - Entreveloper Crossword Viewer

- #### Add it to your website to show Crosswords to your visitors
- #### It can highlight errors or solve the crossword as well
- #### A Wordpress plugin will be added soon to make it even easier to use it

Created with HTML5 Canvas and Javascript

Released under the MIT License

## Data format

The tool reads Crosswords stored using our custom xml format. The structure of the xml-based crossword data format 
is simple and self-descriptive. While not difficult to manually create crosswords using this format, a tool to interactively 
create crosswords from a list of words is also provided below.<br>
You can see a few examples of crosswords in our format [here](index.html), and read about the format below:<br>

&lt;!-- the top of the file contains the name,subject and dimensions of the crossword--&gt;<br>
**&lt;cw name=&quot;a name here&quot; subject=&quot;crossword subject&quot; cols=&quot;17&quot; rows=&quot;17&quot;&gt;**
<br>
&lt;!-- section for horizontal words--&gt;<br>
**&lt;horizontals&gt;**  <br>
&lt;!-- sample horizontal word. Enter the word (value), and position (column 8, row 6)--&gt;<br>
&lt;!-- then enter the hint the end user will see--&gt;<br>
**&lt;word value=&quot;edison&quot; xpos=&quot;8&quot; ypos=&quot;6&quot;&gt;  <br>Inventor of the light bulb, among many inventions (surname)  <br>&lt;/word&gt;**<br>
&lt;-- your other horizontal words, then follow it with a similar section for your vertical words--&gt;<br>
**...  <br>&lt;/horizontals&gt;**<br>
&lt;!-- section for vertical words--&gt;<br>
**&lt;verticals&gt;**  <br>
&lt;!-- a vertical word in column 8 and row 6--&gt;<br>
**&lt;word value=&quot;cruise&quot; xpos=&quot;8&quot; ypos=&quot;6&quot;&gt;  <br>European union (initials)<br>&lt;/word&gt;<br>...<br>&lt;/verticals&gt;<br>&lt;/cw&gt;**<br>

## Crossword Maker

This crossword viewer tool has a companion tool that makes easier creating crosswords in our format.<br>
You can download a .zip file [here](maker/maker.zip) which contains a Windows executable (.exe): CwMaker.exe for Windows users, as well as a 
.jar file that can run on MacOS and Linux. <br>
Once downloaded, check the integrity of the file:<br>
Checksum (SHA-256): 281F784B6BA5A0A92CCE0029063B403DF4C134BA098DE58BA4530B3376AB3025

The tool was created with Java 1.8 and requires the Java runtime to be available on the computer for it to run.

### How it works

Run the tool and go to **Help > Help Index**, in the top menu, for assistance to use the tool.<br>
But briefly, you can create a new project or open an existing one.
When you start a new project, you must enter the name, number of columns and number of rows of your crossword.<br>
Additionally, you must specify a file with a list of words to use in your crossword.<br>
This file can be just a list of single words (one word per row), or it can already contain the hint or clue for the end user, 
next to the word, separated by ;; (2 semi-colon).
Below are some examples of valid lists of words for the crossword making tool:<br>
[Celebrities](maker/celebrities.txt), [Elephants](maker/elephants.txt), [Countries](maker/countries.txt).<br>

#### Have Fun! :-)



