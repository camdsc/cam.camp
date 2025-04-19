<?php
/**
 * Template Name: Style Guide
 * Description: Template for testing and customizing WordPress content styles
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Toggle Header -->
    <div class="toggle-header">
        <button class="toggle-button">Toggle Content</button>
    </div>

    <!-- Main Content -->
    <div class="style-guide-content">
        <!-- Headings -->
        <h1>Heading 1 - Main Title</h1>
        <h2>Heading 2 - Section Title</h2>
        <h3>Heading 3 - Subsection</h3>
        <h4>Heading 4 - Minor Section</h4>
        <h5>Heading 5 - Small Section</h5>
        <h6>Heading 6 - Tiny Section</h6>

        <!-- Paragraphs -->
        <p>This is a regular paragraph. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

        <p>This is another paragraph with <strong>bold text</strong>, <em>italic text</em>, and <a href="#">a link</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

        <!-- Lists -->
        <h3>Unordered List</h3>
        <ul>
            <li>First item in the list</li>
            <li>Second item with some longer text that might wrap to multiple lines</li>
            <li>Third item</li>
            <li>Fourth item</li>
        </ul>

        <h3>Ordered List</h3>
        <ol>
            <li>First numbered item</li>
            <li>Second numbered item</li>
            <li>Third numbered item</li>
        </ol>

        <!-- Blockquotes -->
        <h3>Blockquote</h3>
        <blockquote>
            <p>This is a blockquote. It should stand out from the regular text and have some special styling. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <cite>— Author Name</cite>
        </blockquote>

        <!-- Code -->
        <h3>Code Block</h3>
        <pre><code>function example() {
    console.log("This is a code block");
    return true;
}</code></pre>

        <!-- Tables -->
        <h3>Table</h3>
        <table>
            <thead>
                <tr>
                    <th>Header 1</th>
                    <th>Header 2</th>
                    <th>Header 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Cell 1</td>
                    <td>Cell 2</td>
                    <td>Cell 3</td>
                </tr>
                <tr>
                    <td>Cell 4</td>
                    <td>Cell 5</td>
                    <td>Cell 6</td>
                </tr>
            </tbody>
        </table>

        <!-- Images -->
        <h3>Images</h3>
        <figure class="wp-block-image">
            <img src="https://via.placeholder.com/800x400" alt="Placeholder image">
            <figcaption>This is an image caption</figcaption>
        </figure>

        <!-- Buttons -->
        <h3>Buttons</h3>
        <div class="button-group">
            <button class="button">Regular Button</button>
            <button class="button button-primary">Primary Button</button>
            <button class="button button-secondary">Secondary Button</button>
        </div>

        <!-- Forms -->
        <h3>Form Elements</h3>
        <form class="style-guide-form">
            <div class="form-group">
                <label for="text-input">Text Input</label>
                <input type="text" id="text-input" placeholder="Enter text">
            </div>
            <div class="form-group">
                <label for="textarea">Textarea</label>
                <textarea id="textarea" placeholder="Enter longer text"></textarea>
            </div>
            <div class="form-group">
                <label for="select">Select</label>
                <select id="select">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                </select>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox"> Checkbox
                </label>
            </div>
            <div class="form-group">
                <label>
                    <input type="radio" name="radio"> Radio 1
                </label>
                <label>
                    <input type="radio" name="radio"> Radio 2
                </label>
            </div>
        </form>
    </div>
</main>

<style>
/* Style Guide Specific Styles */
.toggle-header {
    margin: 20px 0;
    text-align: center;
}

.toggle-button {
    padding: 10px 20px;
    background: #f0f0f0;
    border: none;
    cursor: pointer;
    transition: background 0.3s ease;
}

.toggle-button:hover {
    background: #e0e0e0;
}

.style-guide-content {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

/* Typography */
h1, h2, h3, h4, h5, h6 {
    margin: 1.5em 0 0.5em;
    line-height: 1.4;
}

h1 { font-size: 2.5em; }
h2 { font-size: 2em; }
h3 { font-size: 1.75em; }
h4 { font-size: 1.5em; }
h5 { font-size: 1.25em; }
h6 { font-size: 1em; }

p {
    margin-bottom: 1.5em;
    line-height: 1.8;
}

/* Lists */
ul, ol {
    margin: 1em 0;
    padding-left: 2em;
}

li {
    margin-bottom: 0.5em;
}

/* Blockquotes */
blockquote {
    margin: 2em 0;
    padding: 1em 2em;
    border-left: 4px solid #000;
    background: #f9f9f9;
}

blockquote cite {
    display: block;
    margin-top: 1em;
    font-style: italic;
}

/* Code */
pre {
    background: #f5f5f5;
    padding: 1em;
    border-radius: 4px;
    overflow-x: auto;
}

code {
    font-family: 'Oxygen Mono', monospace;
    font-size: 0.9em;
}

/* Tables */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 2em 0;
}

th, td {
    padding: 0.75em;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background: #f5f5f5;
}

/* Images */
.wp-block-image {
    margin: 2em 0;
}

.wp-block-image img {
    max-width: 100%;
    height: auto;
}

figcaption {
    text-align: center;
    font-style: italic;
    margin-top: 0.5em;
}

/* Buttons */
.button-group {
    margin: 2em 0;
    display: flex;
    gap: 1em;
}

.button {
    padding: 0.75em 1.5em;
    border: none;
    background: #f0f0f0;
    cursor: pointer;
    transition: background 0.3s ease;
}

.button-primary {
    background: #000;
    color: #fff;
}

.button-secondary {
    background: #666;
    color: #fff;
}

/* Forms */
.style-guide-form {
    margin: 2em 0;
}

.form-group {
    margin-bottom: 1.5em;
}

label {
    display: block;
    margin-bottom: 0.5em;
}

input[type="text"],
textarea,
select {
    width: 100%;
    padding: 0.75em;
    border: 1px solid #ddd;
    border-radius: 4px;
}

textarea {
    min-height: 150px;
}

input[type="checkbox"],
input[type="radio"] {
    margin-right: 0.5em;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.querySelector('.toggle-button');
    const content = document.querySelector('.style-guide-content');
    
    toggleButton.addEventListener('click', function() {
        content.style.display = content.style.display === 'none' ? 'block' : 'none';
    });
});
</script>

<?php
get_footer();
?> 