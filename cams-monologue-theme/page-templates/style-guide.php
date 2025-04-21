<?php
/**
 * Template Name: Style Guide
 * Description: A template that demonstrates content styles and elements
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <button class="toggle-button" data-target="toggle-content" style="margin-left: 0; padding-left: 0; text-align: left; display: block;">Toggle Content</button>
                <div id="toggle-content" class="toggle-content" style="margin-left: 0; padding-left: 0;">
                    <h1>Heading 1 - Main Title</h1>
                    <h2>Heading 2 - Section Title</h2>
                    <h3>Heading 3 - Subsection</h3>
                    <h4>Heading 4 - Minor Section</h4>
                    <h5>Heading 5 - Small Section</h5>
                    <h6>Heading 6 - Tiny Section</h6>

                    <p>This is a regular paragraph. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <p>This is another paragraph with <strong>bold text</strong>, <em>italic text</em>, and <a href="#">a link</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

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

                    <h3>Blockquote</h3>
                    <blockquote>
                        <p>This is a blockquote. It should stand out from the regular text and have some special styling. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p>— Author Name</p>
                    </blockquote>

                    <h3>Code Block</h3>
                    <pre><code>function example() {
    console.log("This is a code block");
    return true;
}</code></pre>

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

                    <h3>Images</h3>
                    <figure>
                        <img src="https://via.placeholder.com/800x400" alt="Placeholder image">
                        <figcaption>This is an image caption</figcaption>
                    </figure>

                    <h3>Buttons</h3>
                    <p>
                        <button class="button">Regular Button</button>
                        <button class="button button-primary">Primary Button</button>
                        <button class="button button-secondary">Secondary Button</button>
                    </p>

                    <h3>Form Elements</h3>
                    <p>
                        <label for="text-input">Text Input</label><br>
                        <input type="text" id="text-input" name="text-input">
                    </p>
                    <p>
                        <label for="textarea">Textarea</label><br>
                        <textarea id="textarea" name="textarea" rows="4"></textarea>
                    </p>
                    <p>
                        <label for="select">Select</label><br>
                        <select id="select" name="select">
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                        </select>
                    </p>
                    <p>
                        <input type="checkbox" id="checkbox" name="checkbox">
                        <label for="checkbox">Checkbox</label>
                    </p>
                    <p>
                        <input type="radio" id="radio1" name="radio" value="radio1">
                        <label for="radio1">Radio 1</label>
                        <input type="radio" id="radio2" name="radio" value="radio2">
                        <label for="radio2">Radio 2</label>
                    </p>
                </div>
                
                <h3>Details/Summary Toggle Example</h3>
                <details>
                    <summary>Click to expand this section</summary>
                    <p>This is toggle content using the HTML5 details/summary elements. This shows the toggle caret aligned to the left of the text as requested.</p>
                    <ul>
                        <li>The content inside remains properly aligned</li>
                        <li>The toggle caret sits to the left of the content margin</li>
                    </ul>
                </details>
                
                <details>
                    <summary>Another expandable section</summary>
                    <p>More content that demonstrates how the toggle works with the caret positioned correctly.</p>
                </details>
                
                <?php
                the_content();
                ?>
            </div>
        </article>
    </main>
</div>

<?php
get_footer();
?> 