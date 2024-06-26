import Quill from 'quill/core';


import 'quill/dist/quill.snow.css';


import Toolbar from 'quill/modules/toolbar'
import Snow from 'quill/themes/snow'

import Bold from 'quill/formats/bold'
import Italic from 'quill/formats/italic'
import Header from 'quill/formats/header'
import Underline from 'quill/formats/underline'
import ListItem from 'quill/formats/list'
import Strike from 'quill/formats/strike'
import Blockquote from 'quill/formats/blockquote'
import CodeBlock from 'quill/formats/code'
import Script from 'quill/formats/script'
import Image from 'quill/formats/image'
import Link from 'quill/formats/link'
import QuillToggleFullscreenButton from 'quill-toggle-fullscreen-button';

Quill.register({
  'modules/toolbar': Toolbar,
  'themes/snow': Snow,
  'formats/bold': Bold,
  'formats/italic': Italic,
  'formats/header': Header,
  'formats/underline': Underline,
  'formats/list': ListItem,
  'formats/strike' : Strike,
  'formats/blockquote' : Blockquote,
  'formats/codeblock' : CodeBlock,
  'formats/script' : Script,
  'formats/image' : Image,
  'formats/link' : Link,
  'modules/toggleFullscreen' : QuillToggleFullscreenButton,
});



export default Quill;