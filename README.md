# jqueryui-file-uploader
A jQueryUI themed file upload example.

## Synopsis

I realize there are a bunch of other file upload tools out there, but with HTML5
providing such a powerful set of tools, I wanted my own.  I use jQueryUI quite a 
bit, so this example implements everything with that in mind.  If you change the
theme you are using, my examples will change accordingly as well.

I had to do some trickery around a couple items...

1) the <input type="file"> had to be completely hidden and overlayed with a 
decent looking button.  Because this input type is a browser specific creature,
I could not find a good way to style it.  So I simply hide it, then implement
my own button over the top of it.  I had to write a function to display the 
selected filename as a result.  You'll see what I mean if you look at the HTML
around this input tag.

2) To get the effect of the progress bar that I wanted, I chose not to use the
stock jqueryui progress bar widget.  You could easily do so, but instead I simply
created two divs directly on top of each other and then simply changed the width
of the front one to give the appearance of a bar moving across the screen.


## Author

Vern Six 
Email:   vern@ipinga.com
Twitter: @vernsix

## License

Copyright (c) 2015 Vern Six

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.