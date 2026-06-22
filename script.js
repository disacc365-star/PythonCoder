function isPython(code) {
    var nonPython = ['<?php', '<?', '?>', '<html', '<div', '<body', '<head', '<script', '<style', '<table', '<form', '<h1', '<p>', '<a ', '<img', '<!--', 'function (', 'var ', 'let ', 'const ', 'echo ', '<!DOCTYPE'];
    for (var i = 0; i < nonPython.length; i++) {
        if (code.indexOf(nonPython[i]) !== -1) {
            return false;
        }
    }
    return true;
}

function runCode() {
    var code = document.getElementById('codeInput').value;
    if (code.trim() === '') {
        document.getElementById('output').textContent = 'code is wrong or not python';
        return;
    }
    if (!isPython(code)) {
        document.getElementById('output').textContent = 'code is wrong or not python';
        return;
    }
    var lines = code.split('\n');
    var output = '';
    var vars = {};
    for (var i = 0; i < lines.length; i++) {
        var line = lines[i].trim();
        if (line === '') continue;
        var match = line.match(/^print\s*\(\s*(['"])(.*?)\1\s*\)\s*$/);
        if (match) {
            output += match[2] + '\n';
            continue;
        }
        match = line.match(/^print\s*\((.*)\)\s*$/);
        if (match) {
            var arg = match[1].trim();
            if (vars[arg] !== undefined) {
                output += vars[arg] + '\n';
            } else {
                output += arg + '\n';
            }
            continue;
        }
        match = line.match(/^([a-zA-Z_]\w*)\s*=\s*(.+)$/);
        if (match) {
            vars[match[1].trim()] = match[2].trim();
            output += line + '\n';
            continue;
        }
        if (vars[line] !== undefined) {
            output += vars[line] + '\n';
            continue;
        }
        output += line + '\n';
    }
    document.getElementById('output').textContent = output.trim();
}

function clearOutput() {
    document.getElementById('codeInput').value = '';
    document.getElementById('output').textContent = '';
}
