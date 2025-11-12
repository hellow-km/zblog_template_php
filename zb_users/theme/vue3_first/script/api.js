async function getCategories() {
    try {
        const response = await fetch(
            "/zb_users/theme/vue3_first/api/getData.php",
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: "type=categorys",
            },
        );

        const result = await response.json();
        if (result.code === 200) {
            return result.data;
        } else {
            console.error(result.message);
            return [];
        }
    } catch (err) {
        console.error("请求失败", err);
        return [];
    }
}

async function getArticles(tagId, page = 1, pageSize = 10) {
    try {
        const response = await fetch(
            "/zb_users/theme/vue3_first/api/getData.php",
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: `type=articles&page=${page}&pageSize=${pageSize}${tagId ? "&tagId=" + tagId : ""}`,
            },
        );

        const result = await response.json();
        if (result.code === 200) {
            return result.data;
        } else {
            console.error(result.message);
            return [];
        }
    } catch (err) {
        console.error("请求失败", err);
        return [];
    }
}

async function getNavBar() {
    try {
        const response = await fetch(
            "/zb_users/theme/vue3_first/api/getData.php",
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: `type=navBar`,
            },
        );

        const result = await response.json();
        if (result.code === 200) {
            return result.data;
        } else {
            console.error(result.message);
            return [];
        }
    } catch (err) {
        console.error("请求失败", err);
        return [];
    }
}
