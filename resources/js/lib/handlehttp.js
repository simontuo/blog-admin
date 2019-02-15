// axios 响应拦截器，异常信息提示处理
window.axios.interceptors.response.use(response => {
    return response;
}, error => {
    if (error && error.response) {
        switch (error.response.status) {
            case 400:
                // error.message = '请求错误';
                error.message = error.response.data.message;
                window.iView.Notice.error({
                    title: error.message,
                    desc: '',
                });
                break;

            case 401:
                error.message = '未授权，请登录';
                window.iView.Notice.error({
                    title: error.message,
                    desc: '',
                });
                break;

            case 403:
                // error.message = '拒绝访问';
                error.message = error.response.data.message;
                window.iView.Notice.error({
                    title: error.message,
                    desc: '',
                });
                break;

            case 404:
                error.message = `请求地址出错: ${error.response.config.url}`;
                window.iView.Notice.error({
                    title: error.message,
                    desc: '',
                });
                break;

            case 408:
                error.message = '请求超时';
                window.iView.Notice.error({
                    title: error.message,
                    desc: '',
                });
                break;
            case 422:
                error.message = '数据验证出错';
                let descs = error.response.data.errors;
                let desc = '';
                Object.keys(descs).forEach(function(key){
                    desc += descs[key][0];
                });

                window.iView.Notice.warning({
                    title: error.message,
                    desc: desc,
                });
                break;

            case 500:
                error.message = '服务器内部错误';
                window.iView.Notice.error({
                    title: error.message,
                    desc: '',
                });
                break;

            case 501:
                error.message = '服务未实现';
                window.iView.Notice.error({
                    title: error.message,
                    desc: '',
                });
                break;

            case 502:
                error.message = '网关错误';
                window.iView.Notice.error({
                    title: error.message,
                    desc: '',
                });
                break;

            case 503:
                error.message = '服务不可用';
                window.iView.Notice.error({
                    title: error.message,
                    desc: '',
                });
                break;

            case 504:
                error.message = '网关超时';
                break;

            case 505:
                error.message = 'HTTP版本不受支持';
                window.iView.Notice.error({
                    title: error.message,
                    desc: '',
                });
                break;

            default:
                error.message = error.response.data.message;
                window.iView.Notice.error({
                    title: error.message,
                    desc: '',
                });
                break;
        }
    }

    return Promise.reject(error);
});
