/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.shiftEnterMode = CKEDITOR.ENTER_P;
	config.enterMode = CKEDITOR.ENTER_BR;
	config.language='id';
	config.uiColor='#bfd6e8';
	config.toolbarGroups = [
		{name:'document',groups:['mode','document','doctools']},
		{name:'clipboard',groups:['clipboard','undo']},
		{name:'editing',groups:['find','selection','spellchecker','editing']},
		{name:'forms',groups:['forms']},
		{name:'basicstyles',groups:['basicstyles','cleanup']},
		{name:'paragraph',groups:['list','indent','blocks','align','bidi','paragraph']},
		{name:'links',groups:['links']},
		{name:'styles',groups:['styles']},
		{name:'insert',groups:['insert']},
		{name:'colors',groups:['colors']},
		{name:'tools',groups:['tools']},
		{name:'others',groups:['others']},
		{name:'about',groups:['about']}
	];
};
